<!--
<div id = "bottomPanel" class = "thumbPanel">
    {foreach $randomPhotos as $photo}
    <div class = "photoContainer">
        <a href = "{link :Galerie:, akce_id=>$randomGallery->akce_id, photo=>$photo->photo}" title = "{$photo->label}">
            <img src = "{$photo->thumbnail}" alt = "{$photo->label}" style = "margin-top: {=round(125 - $photo->height) / 2}px"/>
        </a>
    </div>
    {/foreach}
</div>
-->