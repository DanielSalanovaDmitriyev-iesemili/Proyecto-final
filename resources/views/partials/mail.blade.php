@extends('layouts.index')
@section('content')
<style>
    .success {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 5s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: absolute;
  top: 0;
  right: 0

}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
  }
}
</style>
    @if (Session::has('success'))
        <p class="success absolute top-0 right-0 bg-green-600 text-white p-2 rounded-md">{{Session::get('success')}}</p>
    @endif
<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-12 md:gap-6">
      <div class="md:col-span-2 text-xl">
        {{__('Contact Form')}}
      </div>
      <div class="mt-5 md:mt-0 md:col-span-10">
        <form  action="{{route('mail.store')}}" method="POST">
            @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">{{__('Name')}}</label>
                  <input required type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old("name")}}">
                  @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name')}}</p>
                  @endif
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="surname" class="block text-sm font-medium text-gray-700">{{__('Surname')}}</label>
                    <input required type="text" name="surname" id="surname" autocomplete="surname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old("surname")}}">
                    @if($errors->has('surname'))
                      <p class="text-danger">{{ $errors->first('surname')}}</p>
                    @endif
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{__('Email')}}</label>
                    <input required type="email" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old("email")}}">
                    @if($errors->has('email'))
                      <p class="text-danger">{{ $errors->first('email')}}</p>
                    @endif
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="issue" class="block text-sm font-medium text-gray-700">{{__('Issue')}}</label>
                    <input required type="text" name="issue" id="issue" autocomplete="issue" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old("issue")}}">
                    @if($errors->has('issue'))
                      <p class="text-danger">{{ $errors->first('issue')}}</p>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">{{__('Message')}}</label>
                    <textarea required name="message" id="message" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"  cols="30" rows="10" placeholder="{{__('Leave a comment here')}}">{{old('message')}}</textarea>
                    @if($errors->has('message'))
                        <p class="text-danger">{{ $errors->first('message')}}</p>
                    @endif
                </div>


            </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{__('Send')}}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>

  </script>

@endsection
