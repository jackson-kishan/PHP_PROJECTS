<?php

class UserController
{

  public function index()
  {
    echo json_encode([
      'users' => [
        ['id' => 1,
        'name' => "Kishan"
        ],
        ['id' => 2,
        'name' => "Jackson"
        ],
      ]
    ]);
  }
}