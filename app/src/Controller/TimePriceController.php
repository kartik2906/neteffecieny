<?php

namespace App\Controller;


use App\Entity\Option;
use App\Service\Main_finance;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TimePriceController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $titleData = 'Welcome!';
        $outputData = 'Please use "/time" or "/price" as URL.';
    
        return $this->render('theme.html.twig',[
            'outputData' => $outputData,
            'titleData'  => $titleData
        ]
        );
    }


    /**
     * @Route("/price", name="price")
     */
    public function price(){
        $titleData = 'Today\'s price';
        $price = 0;

        $result = $this->getDoctrine()
            ->getRepository(Option::class)
            ->findDisplayByPrice('display_price');
        if($result[0]->getValue()  === 'yes'){
            $result = $this->getDoctrine()
            ->getRepository(Option::class)
            ->findByPrice('price');
            if($result){
                $price = $result[0]->getValue();
            }
        }
        if ($price) {
            $data = new Main_finance();
            $titleData = 'Today\'s price';
            $outputData = 'Final price: '.$data->VAT($price, $tax);
            $outputData .= ' Tax: '.$tax;
        } else {
            $outputData = 'We don\'t have price for today';
        }

        return $this->render('theme.html.twig',[
            'outputData' => $outputData,
            'titleData'  => $titleData
        ]

        );
    }

    /**
     * @Route("/time", name="time")
     */
    public function time(){
        $data = new Main_finance();
        $titleData = 'Time';
        $outputData = $data->today(); 

        return $this->render('theme.html.twig',[
            'outputData' => $outputData,
            'titleData'  => $titleData
        ]
        );
    }
    
}
