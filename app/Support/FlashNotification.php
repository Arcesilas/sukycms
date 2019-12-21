<?php

namespace App\Support;

class FlashNotification
{
    public const SUCCESS = 'success';

    public const ERROR = 'error';

    public string $title = '';

    public string $text = '';

    public string $type = 'success';

    public int $timer = 5000;

    public bool $toast = true;

    public string $position = 'top-end';

    public function __construct(string $title, string $text = '', string $type = 'success')
    {
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
    }

    public function timer(int $timer): self
    {
        $this->timer = $timer;

        return $this;
    }

    public function toastr(bool $toast): self
    {
        $this->toast = $toast;

        return $this;
    }

    public function position(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function show(): void
    {
        session()->flash('flash_notification', [
            'title' => $this->title,
            'text' => $this->text,
            'icon' => $this->type,
            'timer' => $this->timer,
            'toast' => $this->toast,
            'position' => $this->position,
        ]);
    }
}
