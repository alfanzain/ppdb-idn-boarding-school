<?php

namespace App\Http\Livewire\Guest;

use App\Models\Registrant;
use App\Models\User;
use App\Traits\Form\BranchesProgramsDropdown;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentRegistration extends Component
{
    use WithFileUploads, BranchesProgramsDropdown;

    public $isSubmissionDisabled = true;
    public $email;
    public $password;
    public $name;
    public $gender;
    public $transferEvidence;

    protected $rules = [
        'email' => ['required', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        'name' => ['required', 'string'],
        'gender' => ['required', 'string', 'in:L,P'],
        'selectedBranchId' => ['required', 'string'],
        'selectedProgramId' => ['required', 'string'],
        'transferEvidence' => ['required', 'mimes:jpg,jpeg,png', 'image', 'max:1024'],
    ];

    protected $messages = [
        'email.unique' => 'Email sudah terdaftar, silahkan login disini',
    ];

    public function render()
    {
        return view('livewire.guest.student-registration');
    }

    public function updated()
    {
        try {
            $this->validate();
            $this->isSubmissionDisabled = false;
        } catch (ValidationException $e) {
            $this->isSubmissionDisabled = true;
        }
    }

    public function updatedTransferEvidence()
    {
        try {
            $this->validate([
                'transferEvidence' => $this->rules['transferEvidence']
            ]);
        } catch (ValidationException $e) {
            $this->transferEvidence = null;

            $this->dispatchBrowserEvent('swalError', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->checkBranchProgramQuota();

            $path = $this->transferEvidence->store('registration/transfer-evidence');

            DB::beginTransaction();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            Registrant::create([
                'user_id' => $user->id,
                'gender' => $this->gender,
                'branch_id' => $this->selectedBranchId,
                'program_id' => $this->selectedProgramId,
                'transfer_evidence' => $path,
            ]);

            DB::commit();

            $this->dispatchBrowserEvent('swalSuccess', [
                'message' => "Selamat! Pendaftaran Berhasil",
            ]);
        } catch (ValidationException $e) {
            $this->dispatchBrowserEvent('swalError', [
                'message' => $e->getMessage(),
            ]);
        } catch (\Throwable $e) {
            $this->dispatchBrowserEvent('swalError', [
                'message' => $e->getMessage(),
            ]);
        }
    }
}
