<?php

function tanggal($value) {
    return \Carbon\Carbon::parse($value)->format('d-m-Y');
}