<?php
  namespace App\Controller;


  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;

  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Request;

  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\Extension\Core\Type\EmailType;

  use App\Entity\Contact;

  class ContactController extends AbstractController {
    /**
     * @Route("/form", name="contact_list")
     */
    public function new(Request $request)
    {
        $contact = new Contact();

       $form = $this->createFormBuilder($contact)
       ->add('nev', TextType::class, array('label'=> 'Név', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
       ->add('email', EmailType::class, array('label'=> 'E-mail','attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
       ->add('uzenet', TextareaType::class, array('label'=> 'Üzenet','attr' => array('class' => 'form-control')))
       ->add('submit', SubmitType::class, array('label'=> 'Küldés', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')))
       ->getForm();

       $form->handleRequest($request);

       if($form->isSubmitted() &&  $form->isValid()){
        $contact = $form->getData();
    
        

        $sn = $this->getDoctrine()->getManager();      
        $sn -> persist($contact);
        $sn -> flush();

        $this->addFlash('success', 'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
        
        return $this->redirectToRoute('contact_list');
    }

       return $this->render('contact/form.html.twig', 
       array( 'form' => $form->createView()
    ));

    
   

    

  }
}