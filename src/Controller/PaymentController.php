<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pay")
 */
class PaymentController extends AbstractController
{
    /**
     * @Route("/", name="pay-index")
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function index()
    {
        \Stripe\Stripe::setApiKey('sk_test_1lqPf3wmcjsq7WPvMm7phL6X00KiGazLp7');

        $intent = \Stripe\PaymentIntent::create([
            'amount' => 3000,
            'currency' => 'eur',
        ]);

        return $this->render('payment/index.html.twig',
            [

            ]);
    }
}
