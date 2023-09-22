<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button class="btn btn-danger" onclick="confirmUserDeletion()">
        Delete Account
    </button>

    <!-- Modal for confirming user deletion -->
    <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['method' => 'DELETE', 'route' => 'profile.destroy', 'class' => 'p-6']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <div class="mt-3">
                        {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                        @error('userDeletion.password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {!! Form::submit('Delete Account', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

<script>
    function confirmUserDeletion() {
        // Show the modal using Bootstrap's JavaScript
        $('#confirm-user-deletion-modal').modal('show');
    }
</script>