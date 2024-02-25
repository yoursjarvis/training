<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(): View
    {
        return view('employees.create');
    }

    public function delete($id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function edit($id): View
    {
        $employee = Employee::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    public function index(): View
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', 'unique:employees,email'],
            'mobile_number' => ['required', 'numeric', 'digits:10', 'unique:employees,mobile_number'],
        ]);

        Employee::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'mobile_number' => $validatedData['mobile_number'],
        ]);

        return redirect()->route('employees.index');
    }

    public function update(UpdateEmployeeRequest $request, $id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validated();

        $employee->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
        ]);

        return redirect()->route('employees.index');
    }
}
