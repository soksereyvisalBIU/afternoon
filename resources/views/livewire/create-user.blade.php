<div class="row mt-5" wire:poll.100s>


    <div class="col-6" >
        <div class="card">
            <div class="card-header">
                User Table
            </div>

            <p class="alert alert-warning" wire:offline>
                Whoops, your device has lost connection. The web page you are viewing is offline.
            </p>
            
            <div class="card-body">
                <h3>User : {{ $usersCount }}</h3>

                <div>
                    <input wire:model.live="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </div>


                @if (session('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('delete') }}
                    </div>
                @endif

                <table class="table table-bordered" style="vertical-align: middle">
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>email</td>
                        <td>profile</td>
                        <td>Action</td>
                    </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <img style="max-width: 100px" class="w-100"
                                    src="{{ asset('storage/' . $user->profile) }}" alt="">
                            </td>
                            <td>
                                <button class="btn btn-warning fa fa-edit"
                                    wire:click="edit({{ $user->id }})"></button>
                                <button class="btn btn-outline-danger fa fa-trash"  wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                    wire:click="delete({{ $user->id }})"></button>
                            </td>
                        </tr>
                    @endforeach

                </table>

                {{ $users->links('vendor.livewire.bootstrap') }}

            </div>
        </div>  
    </div>

    <div class="col-6">
        <div class="card">

            <div class="card-header">
                Create User
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="" wire:submit="createUpdate">
                    <div class="form-floating mb-3">
                        <input wire:model="name" type="name" class="form-control" id="floatingName"
                            placeholder="name">
                        <label for="floatingName">Fullname</label>

                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input wire:model="email" type="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>

                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input wire:model="password" type="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>

                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input wire:model="profile" type="file" class="form-control" id="floatingprofile"
                            placeholder="profile">
                        @error('profile')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div wire:loading.remove>
                        <button class="btn btn-success">submit</button>
                    </div>

                </form>

                <div wire:loading> 
                    Saving post...
                </div>
                
            </div>

        </div>
    </div>


</div>
