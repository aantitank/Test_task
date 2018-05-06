<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\Article;
use AppBundle\Model\ArticleQuery;
use AppBundle\Form\Type\ArticleType;


/**
 * Class NewsController
 * @package AppBundle\Controller
 */
class NewsController extends Controller
{
    /**
     * @Route("/{page}", name="news_index", requirements={"page"="\d+"})
     */
    public function indexAction($page=1)
    {

        $news = ArticleQuery::create()->paginate($page,5);
        $count=$news->count();
        return $this->render('news/index.html.twig', [
            'count'=> $count,
            'page' => $page,
            'news' => $news]);
    }

    /**
     * @Route("/search/{page}", name="news_search", requirements={"page"="\d+"})
     */
    public function searchAction(Request $request, $page=1)
    {
        switch ($request->request->get('search_atribute')){
            case 'Title':
                $news = ArticleQuery::create()->filterByTitle($request->request->get('search'))->paginate($page,5);
                break;
            case 'Abstract':
                $news = ArticleQuery::create()->filterByAbstract($request->request->get('search'))->paginate($page,5);
                break;
            case 'Date':
                $news = ArticleQuery::create()->filterByDate($request->request->get('search'))->paginate($page,5);
                break;
            case 'Text':
                $news = ArticleQuery::create()->filterByText($request->request->get('search'))->paginate($page,5);
                break;
            case 'Activity':
                $news = ArticleQuery::create()->filterByActivity($request->request->get('search'))->paginate($page,5);
                break;
        }
        $count=$news->count();
        return $this->render('news/search.html.twig', [
            'count'=> $count,
            'page' => $page,
            'news' => $news]);
    }

    /**
     * @Route("/show/{id}", name="news_show", requirements={"id"="\d+"})
     */
    public function showAction($id){
        $article = ArticleQuery::create()->findPk($id);
        return $this->render('news/show.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/publish", name="publish_news")
     */
    public function publishAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();
            $article->setTitle($data->getTitle());
            $article->setAbstract($data->getAbstract());
            $article->setDate($data->getDate());
            $article->setText($data->getText());
            $article->setActivity($data->getActivity());
            $article->save();
            return $this->redirectToRoute('news_index');

        }

        return $this->render('news/publish.html.twig', [
            'form' => $form->createView(),
        ]);
	}

    /**
     * @Route("/edit/{id}", name="news_edit", requirements={"id"="\d+"})
     */
    public function editAction(Request $request, $id)
    {
        $article = ArticleQuery::create()->findPk($id);
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();
            $article->setTitle($data->getTitle());
            $article->setAbstract($data->getAbstract());
            $article->setDate($data->getDate());
            $article->setText($data->getText());
            $article->setActivity($data->getActivity());
            $article->save();
            return $this->redirectToRoute('news_index');
        }

        return $this->render('news/publish.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="news_delete", requirements={"id"="\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $article = ArticleQuery::create()->filterById($id)->find();
        $article->delete();
        return $this->redirectToRoute('news_index');
    }
}
