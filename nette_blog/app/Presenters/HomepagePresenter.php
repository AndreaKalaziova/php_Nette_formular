<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    protected function createComponentRegistrationForm() : Form
    {
        $form = new Form;
        $form->addText('name', 'Jméno:');
        $form->addPassword('password', 'Heslo:');
        $form->addSubmit('send', 'Registrovat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {
        // tady zpracujeme data odeslaná formulářem
        // $data->name obsahuje jméno
        // $data->password obsahuje heslo

        $this->flashMessage('Byl jste úspěšně registrován');
        $this->flashMessage('Jméno:' . $data->name);
        $this->flashMessage('Heslo: ' . $data->password);

        $this->redirect('Homepage:');
    }
}

class RegistrationFormData
{
    public function __construct(
        public string $name,
        public string $password,
    )
    {
    }

    public function formSucceeded(Form $form, RegistrationFormData $data): void
    {
        /*
        $data = $form->getValues(RegistrationFormData::class);
        $name = $data->name;
        $data = $form->getValues(RegistrationFormData::class);
        $password = $data->password;
        */

        // $name je instance RegistrationFormData
        $name = $data->name;
        $password = $data->password;

    }
}


