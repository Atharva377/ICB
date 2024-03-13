<!-- $search_message is a variable thus need to be passed into the component -->
<?php 
$search_message = "Search Product";
?>
<section class="section-search">
<form action="#" class="searchForm">
    <div class="searchBar".<?php echo $searchOn?>>
        <input type="text" name="search" placeholder="<?php echo $search_message;?>" class="search-input" id="search_input">
        <button class="searchButton">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                <path d="M21 21l-6 -6"></path>
            </svg>
        </button>
    </div>
</form>
<div class="searchList">
</div>
</section>