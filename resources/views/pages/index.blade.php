@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center h-screen bg-secondary">
        <div class="flex flex-col mx-auto bg-white rounded-lg items-center gap-11 pt-10 pb-10 mx-4 md:mx-12 flex-wrap p-80">
            <h1 class="text-primary text-6xl"><strong>To continue :</strong></h1>
            <p class="text-accent text-xl">please register or login if you already have an account</p>
            <div>
                <a href="/login"><button class="btn sm:btn-sm md:btn-md lg:btn-lg text-base-100 btn-primary mr-4 rounded-full">Login</button></a>
                <a href="/register"><button class="btn btn-outline sm:btn-sm md:btn-md lg:btn-lg text-base-100 btn-primary rounded-full">Register</button></a>
            </div>
        </div>
    </div>
@endsection
