<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     {{-- line awesome cdn --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"/>

    <title>Admin Notification</title>
  </head>
  <body>
   <div class="conatainer mt-5">
     <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <div class="card-body">
                    @php
                        $notificatios = auth()->user()->unreadnotifications->count();
                    @endphp

                   <a href="{{ url('/admin/dashboard') }}" class="btn btn-success">Back To Dashboard</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    @if ($notificatios>0)
                    @foreach (auth()->user()->unreadnotifications as $notification)
                        <p class="bg-secondary"><strong>{{ $notification->data['name'] }}</strong> created an account....
                            <a href="{{ route('markasread',$notification->id) }}" class="btn btn-primary">Make as read</a>
                        </p>

                    @endforeach
                    @else
                       <p>No new notifications found....</p>
                    @endif
                </div>
            </div>
        </div>
     </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
