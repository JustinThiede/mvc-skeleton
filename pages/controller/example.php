<?php declare(strict_types=1);
/**
 *
 *
 *
 * PHP version 7.4
 *
 *
 * @author Original Author <justin.thiede@visions.ch>
 * @copyright visions.ch GmbH
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/
 */

class Controller
{
    protected View      $view;
    protected Model     $model;
    protected Sanitizer $sanitizer;
    protected string    $action;

    public function __construct($action)
    {
        $this->view      = new View();
        $this->model     = new Model();
        $this->sanitizer = new Sanitizer();
        $this->action    = !empty($action) ? $action : 'index'; // if no action given, use index as default

        // Set class variables to post variables
        foreach ($_POST as $key => $value) {
            $this->{$key} = !empty($value) ? $this->sanitizer->strip($value) : '';
        }

        $this->callpage();
    }

    /**
     *
     * Call Page
     * use action-parameters to call
     * the according view
     *
     * @return void
     */
    protected function callpage(): void
    {
        switch($this->action) {
            default:
                $this->index();
        }
    }

    protected function index()
    {
        $data = $this->model->example();
        $this->view->getview('public', 'index', $data);
    }
}
