<div class="register-box p-4">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h3>Student IDN Boarding School Registration</h3>
        </div>
        <div class="card-body">
            <p class="login-box-msg"></p>

            <div class="callout callout-info">
                <p>Sudah mendaftar? Login <a href="/login">disini</a></p>
            </div>

            <form wire:submit.prevent="submit" method="post" enctype="multipart/form-data">
                <x-forms.input-email label="Username" placeholder="Tulis username kamu disini" />
                <x-forms.input-password label="Password" placeholder="Tulis password kamu disini" info="Minimal 8 karakter" />
                <hr />
                <x-forms.input-text label="Nama Santri" placeholder="Tulis nama kamu disini" model="name" />
                <x-forms.input-radio
                    label="Jenis Kelamin"
                    model="gender"
                    :items="[
                        (object) [
                            'value' => 'L',
                            'label' => 'Laki-laki',
                        ],
                        (object) [
                            'value' => 'P',
                            'label' => 'Wanita',
                        ],
                    ]"
                />
                <x-forms.branches-programs-dropdown
                    :branches="$branches"
                    :programs="$programs"
                />
                <x-forms.input-file-image
                    label="Bukti Transfer"
                    model="transferEvidence"
                    :image="$transferEvidence"
                />
                <x-forms.input-submit :isDisabled="$isSubmissionDisabled" />
            </form>
        </div>
    </div>
</div>

