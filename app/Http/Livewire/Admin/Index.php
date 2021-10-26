<?php

namespace App\Http\Livewire\Admin;

use App\Models\PhoneNumbers;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name;
    public $dob;
    public $student_id;
    public $phone_nbr;

    public $students;
    public $lists = [];

    public $newContact = false;
    public $editContact = false;

    public function mount(): void
    {
        $this->students = Student::all();

    }

    public function store(): void
    {
        $data = $this->validate([
            'name' => 'required|max:20|unique:students',
            'dob' => 'required|before:2020-12-31',

        ]);

        Student::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
        ]);

        $this->dispatchBrowserEvent('show-alert');
        $this->dispatchBrowserEvent('close-modal');

    }

    public function storeContact(): void
    {
        $this->validate([
            'phone_nbr' => 'required|unique:phone_numbers',
        ]);

        PhoneNumbers::create([
            's_id' => $this->student_id,
            'phone_nbr' => $this->phone_nbr,
        ]);

        $this->dispatchBrowserEvent('show-alert');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function storeEdit(): void
    {
        $data = $this->validate([
            'name' => 'required|max:20',
            'dob' => 'required|before:2020-12-31',

        ]);

        Student::where('id',$this->student_id)->update([
            'name' => $data['name'],
            'dob' => $data['dob'],
        ]);


        $this->dispatchBrowserEvent('show-alert');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updated(): void
    {
        $this->validate([
            'name' => 'required|max:20',
            'dob' => 'required|before:2020-12-31',
        ]);

    }

    public function newStudent(): void
    {
        $this->newContact = false;

        $this->student_id = '';
        $this->name = '';
        $this->dob = '';

        $this->dispatchBrowserEvent('show-modal');
    }

    public function addContact(Student $student): void
    {
        $this->newContact = true;

        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->dob = $student->dob;

        $this->dispatchBrowserEvent('show-modal');
    }

    public function editStudent(Student $student): void
    {
        $this->editContact = true;
        $this->newContact = false;

        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->dob = $student->dob;

        $this->dispatchBrowserEvent('show-modal');
    }

    public function droplist(Student $student): void
    {
        $this->lists = PhoneNumbers::where('s_id', $student->id)->get();
        $this->name = $student->name;
        $this->dob = $student->dob;

        $this->dispatchBrowserEvent('dropdown-modal');
    }

    public function render()
    {
//        $this->students = Student::paginate(5);

        return view('livewire.admin.index',[
            'listStudents' => Student::paginate(5)
        ])->extends('layouts.base');
    }
}
