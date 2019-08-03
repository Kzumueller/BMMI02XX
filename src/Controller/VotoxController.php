<?php


namespace App\Controller;


use App\Translations\IVotoxTranslator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/votox")
 */
final class VotoxController extends AbstractController {

    /**
     * simply renders the form, translations will be done asynchronously
     *
     * @param Request $request
     * @return Response
     *
     * @Route("/translations")
     */
    public function translations(Request $request) {
        return $this->render('Votox/translations.html.twig');
    }

    /**
     * @uses IVotoxTranslator to translate a text from a given language passed via GET or POST
     * POST is usually preferable due to its larger maximum size of payloads
     *
     * @param Request $request
     * @param IVotoxTranslator $translator
     * @return JsonResponse
     *
     * @Route("/translate")
     */
    public function translateService(Request $request, IVotoxTranslator $translator) {
        if(Request::METHOD_POST === $request->getMethod()) {
            $text = $request->request->get('text', '');
            $language = $request->request->get('language', '');
        } else { // implies GET
            $text = $request->get('text', '');
            $language = $request->get('language', '');
        }

        if('' !== $language) {
            $results = $translator->translate($text, $language);
        } else {
            $results = 'No language chosen!'; // this can't really happen if the application is used regularly
        }

        return new JsonResponse([
            'results' => $results
        ]);
    }
}