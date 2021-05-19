<section class="">
    <form action="{{route('mail.store')}}" method="POST">
        @csrf
        <!--Grid row-->
        <div class="row g-3 align-items-center">
            <div class="row">
                <div class="col-auto col-md-2">
                    <label for="name" class="col-form-label">{{__('Name')}}</label>
                </div>
                <div class="col-auto col-md-2">
                    <input type="text" id="name" class="form-control" aria-describedby="nameHelpInline" name="name" value="{{old('name')}}">
                </div>
                <div class="col-auto">
                    <span id="nameHelpInline" class="form-text">
                        @if($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name')}}</p>
                        @endif
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-auto col-md-2">
                    <label for="surname" class="col-form-label">{{__('Surname')}}</label>
                </div>
                <div class="col-auto col-md-2">
                    <input type="text" id="surname" class="form-control" aria-describedby="surnameHelpInline" name="surname" value="{{old('surname')}}">
                </div>
                <div class="col-auto">
                    <span id="surnameHelpInline" class="form-text">
                        @if($errors->has('surname'))
                            <p class="text-danger">{{ $errors->first('surname')}}</p>
                        @endif
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-auto col-md-2">
                    <label for="email" class="col-form-label">{{__('Email')}}</label>
                </div>
                <div class="col-auto col-md-2">
                    <input type="email" id="email" class="form-control" aria-describedby="emailHelpInline" name="email" value="{{old('email')}}">
                </div>
                <div class="col-auto">
                    <span id="emailHelpInline" class="form-text">
                        @if($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email')}}</p>
                        @endif
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-auto col-md-2">
                    <label for="issue" class="col-form-label">{{__('Issue')}}</label>
                </div>
                <div class="col-auto col-md-2">
                    <input type="text" id="issue" class="form-control" aria-describedby="issueHelpInline" name="issue" value="{{old('issue')}}">
                </div>
                <div class="col-auto">
                    <span id="issueHelpInline" class="form-text">
                        @if($errors->has('issue'))
                            <p class="text-danger">{{ $errors->first('issue')}}</p>
                        @endif
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="{{__('Leave a comment here')}}" id="floatingTextarea2" style="height: 100px" name="message">{{old('message')}}</textarea>
                    <label for="floatingTextarea2">{{__('Message')}}</label>
                </div>
                <div class="col-auto">
                    <span id="messageHelpInline" class="form-text">
                        @if($errors->has('message'))
                            <p class="text-danger">{{ $errors->first('message')}}</p>
                        @endif
                    </span>
                </div>
            </div>
            <div class="row">
                <label>Acepto los terminos de uso<input type="checkbox" required></label>
            </div>
        </div>
        <!--Grid row-->
        <button type="submit">{{__('Send')}}</button>
    </form>
    </section>
