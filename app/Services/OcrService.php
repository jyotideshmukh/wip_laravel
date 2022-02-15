<?php

namespace App\Services;

use OCR;

class OcrService
{
    public function extract($file)
    {
        $text = OCR::scan($file);
        return $text;
    }

    public function dlNo($text)
    {
        preg_match('/[A-Z][0-9]{7}/', $text, $match);
        if ($match) {
            return $match[0];
        } else {
            return 'Cannot extract';
        }
    }

    public function expiry($text)
    {
        preg_match('/EXP(.*[0-9]{4})/', $text, $match);
        if ($match) {
            return trim($match[1]);
        } else {
            return 'Cannot extract';
        }
    }

    public function lastName($text)
    {
        preg_match('/LN(.*[A-Z]*)/', $text, $match);
        if ($match) {
            return trim($match[1]);
        } else {
            return 'Cannot extract';
        }
    }

    public function firstName($text)
    {
        preg_match('/FN(.*[A-Z]*)/', $text, $match);
        if ($match) {
            return trim($match[1]);
        } else {
            return 'Cannot extract';
        }
    }

    public function address($text)
    {
        preg_match('/\d{4}.*[0-9]{5}/i', $text, $match);
        if ($match) {
            return trim($match[0]);
        } else {
            return 'Cannot extract';
        }
    }
    
    public function dob($text)
    {
        preg_match('/EXP(.*[0-9]{4})/', $text, $match);
        if ($match) {
            return trim($match[0]);
        } else {
            return 'Cannot extract';
        }
    }
}
