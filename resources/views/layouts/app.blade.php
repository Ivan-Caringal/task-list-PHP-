<!DOCTYPE html>
 <html>
 
 <head>
   <title>Laravel 10 Task List App</title>
   <script src="https://cdn.tailwindcss.com"></script>

   {{-- blade-formatter-disable --}}
   <style type="text/tailwindcss">
     .btn {
       @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-green-500 hover:text-white
     }

     .btndel {
       @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-red-500 hover:text-white
     }
 
     .link {
       @apply font-medium text-gray-700 underline decoration-gray-500
     }

      label {
       @apply block uppercase text-slate-700 mb-2
     }
     input, 
     textarea {
       @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
     }

       .error {
       @apply text-red-500 text-sm
     }
   </style>
   {{-- blade-formatter-enable --}}


   @yield('styles')
 </head>
 
 <body >
  
   
   <div>
    @if (session()->has('success'))
       <div class="container mx-auto mt-20 max-w-lg flex flex-col items-center justify-center text-center" style="color: green; font-weight: bold;">{{ session('success') }}</div>
    @endif
     @yield('content')
   </div>
 </body>
 
 </html>