<?php

namespace App\Constants;

enum ContentType: string
{
    case Quiz = 'quiz';
    case Video = 'video';
    case Document = 'document';
}
