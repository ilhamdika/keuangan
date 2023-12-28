@extends('layouts.app')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right' ></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
   
</div>

<ul class="box-info">
    <li>
        <i class='bx bxs-dollar-circle' ></i>
        <span class="text">
            <h3>{{$saldo->nominal}}</h3>
            <p>Saldo</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-dollar-circle' ></i>
        <span class="text">
            <h3>{{$saldo->total_pemasukan}}</h3>
            <p>Total Pemasukan</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-dollar-circle' ></i>
        <span class="text">
            <h3>{{$saldo->total_pengeluaran}}</h3>
            <p>Total Pengeluaran</p>
        </span>
    </li>
</ul>
@endsection