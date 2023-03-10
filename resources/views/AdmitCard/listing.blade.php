<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>free job 24</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="./assets/js/init-alpine.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  <script src="./assets/js/charts-lines.js" defer></script>
  <script src="./assets/js/charts-pie.js" defer></script>
  <style>
    .text1 {
      color: white;
    }
  </style>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('sidebar')

    <div class="flex flex-col flex-1 w-full">
      @include('header')
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <div></div>
          <!-- <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Job Notifications
          </h2> -->
          <!-- CTA -->
          <!-- Annoucement & Horizontal menu -->
          &nbsp;

        
        
       

          <!-- New Table -->
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">post</th>
                    <th class="px-4 py-3"> link</th>
        
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  @foreach($result as $PJob)
                  <tr class="text-gray-700 dark:text-gray-400">
                
                    <td class="px-4 py-3 text-sm">
                      {{$PJob->postjob}}
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                      <a href="{{$PJob->link}}" title="View" target="_blank">  {{$PJob->link}}</a>
                      
                    
                      </span>
                    </td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          
          </div>

          <!-- Charts -->
    
         
        </div>
      </main>
    </div>
  </div>
</body>

</html>