<div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-header bg-transparent border-0 p-0 mb-3">
                            <h3 class="mb-0">Change Password
                                <a href="{{ url('profile') }}" class="btn border rounded-5 float-end" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                                    <img src="https://img.icons8.com/ios-glyphs/17/null/chevron-left.png"/> Back
                                </a>
                            </h3>
                        </div>
                        <div class="card-body border rounded-2">
                            <form wire:submit.prevent="contactFormSubmit" action="/contact" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" style="font-size: 17px; margin-bottom: 3px;">Name</label>
                                    <input wire:model="name" value="{{ old('name') }}" type="text" id="name" class="form-control" />
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" style="font-size: 17px; margin-bottom: 3px;">Email</label>
                                    <input wire:model="email" value="{{ old('email') }}" type="email" id="email" class="form-control" />
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" style="font-size: 17px; margin-bottom: 3px;">Confirm Password</label>
                                    <textarea wire:model="message" class="form-control" id="message" rows="4">{{ old('message') }}</textarea>
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-warning rounded-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
