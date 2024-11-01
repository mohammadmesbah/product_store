<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('assets/css/vendors/bootstrap.css')}}">
  @vite('resources/css/app.css')
</head>
<body dir="rtl">
  
<div class="flex w-full shadow-lg justify-center items-center min-h-auto bg-orange-100">
  <div class="p-2">
    <img src="{{asset('img/logo.png')}}" alt="logo" srcset="" class="h-12 w-12 rounded">
    <h2 class="p-2">YOUR LOGO</h2>
  </div>
  <div class="p-2">
    <ul>
      <li>
        <a href="">اتصل بنا</a>
      </li>
      <li>
        <a href="">من نحن</a>
      </li>
      <li> أعمالنا
        <li>

        </li>
      </li>
    </ul>
  </div>
</div>


  <div class="p-6 bg-white shadow-lg rounded max-w-sm mx-auto flex items-center space-x-4 ">
    <div class="shrink-0">
        <img src="{{asset('img/logo.png')}}" alt="logo" srcset="" class="h-12 w-12">
    </div>
    <div>
        <div class="text-lg text-black font-medium">Chat</div>
        <p class="text-slate-500">Hello world this is my chat..</p>
    </div>
  </div>
 
  <div class="py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
    <img src="{{asset('img/logo.png')}}" alt="logo" srcset="" class="block mx-auto h-24 rounded-full sm:mx-0 shrink-0">
    <div class="text-center space-y-4 sm:text-left">
        <div class="space-y-0 5">
            <p class="text-lg text-black font-semibold">
                Mohammad Mesbah
            </p>
            <p class="text-slate-500 font-medium">
                Product Engineer
              </p>
        </div>
        <button class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Message</button>
    </div>
  </div>


  <script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>
</html>