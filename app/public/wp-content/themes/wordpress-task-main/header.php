<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="bg-gray-300">
    <div class="max-w-4xl mx-auto mb-5 px-4 flex justify-between items-center">
      <h1 class="text-xl sm:text-3xl py-10"><a href="<?php echo get_home_url(); ?>" class="hover:text-teal-600">The Best Blog In The World</a></h1>
      <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-gray-500 hover:text-gray-700 cursor-pointer" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
      </svg>
    </div>
  </div>
  <!-- Search Overlay -->
  <div id="search-overlay" class="transition scale-125 opacity-0 duration-300 ease-in-out flex justify-center invisible bg-white/90 backdrop-blur-sm fixed inset-0 z-10">
    <div class="w-[640px] max-w-full pt-4 sm:pt-16 px-4 sm:px-0">
      <div class="flex justify-end mb-3">
        <svg id="close-overlay-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="text-red-400 hover:text-red-600 cursor-pointer" viewBox="0 0 16 16">
          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
        </svg>
      </div>
      <div class="flex justify-between bg-white border-gray-200 border drop-shadow-md">
        <input id="search-field" placeholder="What are you looking for?" type="text" class="flex-1 text-xl text-gray-500 py-5 px-6 outline-none">
        <div class="flex items-center bg-teal-600 hover:bg-teal-700 cursor-pointer px-5">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-white" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
          </svg>
        </div>
      </div>

      <!-- Search Results -->
      <div>
        <div class="mt-7 py-7 px-8 bg-white border-gray-200 drop-shadow-md">
          <p id="default-message"class="text-gray-400 text-xl p-5 text-center">Results will appear here.</p>

          <p id="no-results-message"class="hidden text-red-600 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block mr-2" viewBox="0 0 16 16">
              <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
            </svg>
            <span>There are no results for that search term.</span>
          </p>
          <!--Spinner Icon -->
          <div id="loading-icon" class="hidden text-center text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="inline-block animate-spin" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
              <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
            </svg>
          </div>
          <!--Search Results -->
          <ul id="results-area" class="hidden space-y-4">


          </ul>
        </div>
      </div>
    </div>
  </div>

<template id="li-template">
            <li>
                <a class="flex items-center text-sm text-teal-700 hover:text-teal-500" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-3" viewBox="0 0 16 16">
                        <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                    </svg>
                    <span class="title-text"> Example Post Result#1</span>
                </a>
            </li>
        </template>
</body>