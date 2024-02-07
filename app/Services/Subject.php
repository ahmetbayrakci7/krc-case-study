<?php
namespace App\Services;

use Observer;
abstract class Subject
{
    protected $observers = [];
    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $this->observers = array_filter($this->observers, function ($observer) {
            return $observer !== $observer;
        });
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}
