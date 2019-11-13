<?php

namespace App\Controller;

use App\Model\Operator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\InputResolver;
use App\Service\CastPostDataToTypeService;
use App\Exception\ValdiationExceptionInterface;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator")
     */
    public function index(Request $request): Response
    {
        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'This is a TechPods - Calculator',
            'operators' => array_merge(Operator::ARITHMETIC_OPERATORS, Operator::BITWISE_OPERATORS),
            'result' => $request->query->get('result'),
            'error' => $request->query->get('error'),
        ]);
    }

    /**
     * @Route("/calculator/calculate", name="calculator_calculate", methods={"POST"})
     */
    public function calculate(Request $request): Response
    {
        $resolver = new InputResolver();
        $castService = new CastPostDataToTypeService();
        $calculator = $resolver->getCalculator($request->request->get('operator'));

        try {
            $calculatedData = $calculator->applyOperation(
                [
                    $castService->castToDigits($request->request->get('value1')),
                    $castService->castToDigits($request->request->get('value2')),
                    $request->request->get('operator'),
                ]
            );
        } catch (ValdiationExceptionInterface $e) {
            return $this->redirectToRoute('calculator', ['error' => $e->getMessage()], 301);
        }

        return $this->redirectToRoute('calculator', ['result' => $calculatedData], 301);
    }
}
