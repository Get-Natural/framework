@extends('layouts.app')

@section('content')
    <main>
        <h1>About us</h1>
        <p>Thank you for using Natural Framework, The best and smallest php static website framework</p>
        <nav>
            <a href="#">Read Docs</a>
            <a href="#">Github</a>
            <a href="#">Donate</a>
        </nav>
        <small>&copy;{{ Date('Y') }} Jim van Eijk</small>
    </main>
@endsection
