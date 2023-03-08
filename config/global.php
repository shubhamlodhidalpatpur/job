<?php
return [
    'APP_URL'=>trim(env('APP_URL')),
    'accountPath'=> trim(env('APP_URL') ?? '').'/'.env('UPLOAD_FOLDER').'/account/',
    'NotesUpload'=> trim(base_path()).'/../'.env('UPLOAD_FOLDER').'/Notes/',
    'Notesfetch'=> trim(env('APP_URL') ?? '').env('UPLOAD_FOLDER').'/Notes/',

];
