@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Mother')}}</label>
                        <input type="text" wire:model="name_mather" class="form-control">
                        @error('name_mather')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Name_Mother_en')}}</label>
                        <input type="text" wire:model="name_mather_en" class="form-control">
                        @error('name_mather_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('Parent_trans.Job_Mother')}}</label>
                        <input type="text" wire:model="job_mather" class="form-control">
                        @error('job_mather')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('Parent_trans.Job_Mother_en')}}</label>
                        <input type="text" wire:model="job_mather_en" class="form-control">
                        @error('job_mather_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('Parent_trans.National_ID_Mother')}}</label>
                        <input type="text" wire:model="nat_id_mather" class="form-control">
                        @error('nat_id_mather')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Passport_ID_Mother')}}</label>
                        <input type="text" wire:model="passport_mather" class="form-control">
                        @error('passport_mather')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('Parent_trans.Phone_Mother')}}</label>
                        <input type="text" wire:model="phone_mather" class="form-control">
                        @error('phone_mather')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="notionlitie_mather_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($notionlities as $notionlitie)
                                <option value="{{$notionlitie->id}}">{{$notionlitie->name}}</option>
                            @endforeach
                        </select>
                        @error('notionlitie_mather_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('Parent_trans.religion_father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="religion_mather_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('religion_mather_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{trans('Parent_trans.gender_mather_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="gender_mather_id">
                            <option selected>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($genders as $gender)
                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                            @endforeach
                        </select>
                        @error('gender_mather_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
                    <textarea class="form-control" wire:model="addres_mather" id="exampleFormControlTextarea1"
                              rows="4"></textarea>
                    @error('addres_mather')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    {{trans('Parent_trans.Back')}}
                </button>

                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                            type="button">{{trans('Parent_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="secondStepSubmit">{{trans('Parent_trans.Next')}}</button>
                @endif

            </div>
        </div>
    </div>

