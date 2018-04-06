<?php
namespace StudentList\Controllers;

class ProfileController extends BaseController
{
    public function __construct(string $requestType, string $action)
    {
        $this->requestType = $requestType;
        $this->action = $action;
    }

    private function processGetRequest()
    {
        if ($this->action === "edit") {
            echo "Here we'll be editing";
        } else {
            echo "Here will be the profile";
        }
    }

    private function processPostRequest()
    {

    }

    public function run()
    {
        if ($this->requestType === "GET") {
            $this->processGetRequest();
        } else {
            $this->processPostRequest();
        }
    }
}