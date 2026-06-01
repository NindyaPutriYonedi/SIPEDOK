<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login E-Berkas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    min-height:100vh;
    background:#0d7af7;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Poppins',sans-serif;
    padding:20px;
}

.login-wrapper{
    width:min(1000px,90vw);
    height:min(650px,85vh);
    display:flex;
    border-radius:6px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.left-panel{
    width:50%;
    background:#0d7af7;
    position:relative;
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:3rem;
}

.left-panel::before{
    content:'';
    width:180px;
    height:180px;
    background:rgba(255,255,255,.08);
    position:absolute;
    top:-60px;
    left:-60px;
    border-radius:50%;
}

.left-panel::after{
    content:'';
    width:220px;
    height:220px;
    background:rgba(255,255,255,.05);
    position:absolute;
    bottom:-90px;
    right:-70px;
    border-radius:50%;
}

.left-title{
    font-size:clamp(1.8rem,2vw,2.5rem);
    font-weight:700;
    text-align:center;
    margin-bottom:1rem;
}

.left-desc{
    text-align:center;
    font-size:clamp(.9rem,1vw,1.1rem);
    line-height:1.6;
    max-width:420px;
    margin-bottom:2rem;
}

.left-image{
    width:60%;
    max-width:260px;
    height:auto;
    margin-bottom:2rem;
}

.tagline{
    padding:.8rem 2rem;
    border-radius:50px;
    background:rgba(255,255,255,.15);
    border:1px solid rgba(255,255,255,.3);
    font-weight:600;
    font-size:.9rem;
    letter-spacing:.5px;
}

.right-panel{
    width:50%;
    background:#f5f5f5;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:75%;
    max-width:380px;
}

.logo{
    width:80px;
    display:block;
    margin:auto;
    margin-bottom:1rem;
}

.login-title{
    text-align:center;
    font-size:clamp(2rem,2vw,2.5rem);
    font-weight:700;
    color:#333;
    margin-bottom:.5rem;
}

.login-subtitle{
    text-align:center;
    color:#666;
    font-size:.95rem;
    margin-bottom:2rem;
}

.input-group{
    position:relative;
    margin-bottom:1.5rem;
}

.input-group input{
    border:none;
    border-bottom:2px solid #ddd;
    border-radius:0;
    background:transparent;
    padding:.75rem 0;
    font-size:1rem;
}

.input-group input:focus{
    box-shadow:none;
    border-color:#0d7af7;
}

.input-icon{
    position:absolute;
    right:10px;
    top:14px;
    color:#0d7af7;
    font-size:1rem;
}

.login-btn{
    width:100%;
    border:none;
    background:#0d7af7;
    color:white;
    padding:.9rem;
    border-radius:50px;
    font-size:1rem;
    font-weight:600;
    transition:.3s;
}

.login-btn:hover{
    background:#005fd4;
}

.alert{
    border-radius:10px;
    font-size:.9rem;
}

@media(max-width:768px){

    body{
        padding:10px;
    }

    .login-wrapper{
        flex-direction:column;
        width:100%;
        height:auto;
    }

    .left-panel,
    .right-panel{
        width:100%;
    }

    .left-panel{
        padding:2rem;
    }

    .left-image{
        max-width:180px;
    }

    .login-box{
        width:90%;
        padding:2rem 0;
    }
}
</style>

</head>
<body>

<div class="login-wrapper">

<div class="left-panel">

<h1 class="left-title">
E-BERKAS & DRAWING
</h1>

<p class="left-desc">
Sistem Digital Divisi Pengembangan &
Perencanaan Perumda Air Minum Kota Padang
</p>

<img
src="{{ asset('gambarlo.png') }}"
class="left-image">

<div class="tagline">
AKSES DATA DIMANA SAJA
</div>

</div>

<div class="right-panel">

<div class="login-box">

<img
src="{{ asset('logo_perumda.png') }}"
class="logo">

<h2 class="login-title">
Login
</h2>

<p class="login-subtitle">
Silahkan masuk untuk mengakses sistem
</p>

@if(session('error'))

<div class="alert alert-danger">
{{ session('error') }}
</div>

@endif

<form action="/login" method="POST">

@csrf

<div class="input-group">

<input
type="text"
name="username"
class="form-control"
placeholder="Username"
required>

<i class="fa-solid fa-user input-icon"></i>

</div>

<div class="input-group">

<input
type="password"
name="password"
class="form-control"
placeholder="Password"
required>

<i class="fa-solid fa-lock input-icon"></i>

</div>

<button type="submit" class="login-btn">
MASUK KE SISTEM
</button>

</form>

</div>

</div>

</div>

</body>
</html>
```
