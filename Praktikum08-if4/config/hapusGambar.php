<?php

function hapusGambar($images, $target)
{
    unlink("../../upload/" . $target . "/" . $images);
    unlink("../../upload/thumbs/" . $target . "/" . $images);
}
