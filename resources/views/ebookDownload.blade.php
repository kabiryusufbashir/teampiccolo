<span class="border-b-2 border-green-600"><a id="file" href="{{ $ebook->path }}">{{ $ebook->name }}</a></span>   
<script>
    const viewFile = document.querySelector('#file');
    window.onload = function(){
        viewFile.click();
    }
</script>