<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  </head>
  <body>

    <div class="container mt-4">
    	<h1>Halaman Login</h1>

		<form method="post" action="{{url("/login")}}">
			@csrf

		  <div class="mb-3">
		    <label for="email" class="form-label">Email User</label>
		    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old("email")}}">
		    @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
		  </div>

		  
		  <div class="mb-3">
		    <label for="password" class="form-label">Password User</label>
		    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old("password")}}">
		    @error('password') <div class="invalid-feedback"> {{$message}} </div> @enderror
		  </div>



		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>