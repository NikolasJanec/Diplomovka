<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class LuckyController
{
    public function number()
    {
        try {
            $number = random_int(0, 100);
        } catch (\Exception $e) {
        }

        return new Response(
            '<html lang=""><body>Lucky number: '.$number.'</body></html>'
        );
    }
}