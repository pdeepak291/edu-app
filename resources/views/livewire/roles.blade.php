<div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <form wire:submit="saveRole">
                        <div class="row">
                            <div class="col-12 col-sm-8">
                                <div class="form-group">
                                    <label for="role_name">Role Name</label>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <input type="text" class="form-control" id="role_name" wire:model="role_name">
                                            @error('role_name')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
