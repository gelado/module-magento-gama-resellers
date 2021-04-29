<?php
namespace GamaAcademy\Reseller\Controller\Reseller;

use GamaAcademy\Reseller\Api\ResellerRepositoryInterface;
use GamaAcademy\Reseller\Api\Data\ResellerInterfaceFactory;
use GamaAcademy\Reseller\Model\ResourceModel\Reseller\CollectionFactory;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Contact\Model\ConfigInterface;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\DataObject;


class Post extends \Magento\Contact\Controller\Index implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var MailInterface
     */
    private $mail;

    private $resellerRepository;
    private $resellerFactory;
    private $collectionFactory;


    /**
     * @param Context $context
     * @param ConfigInterface $contactsConfig
     * @param MailInterface $mail
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig,
        MailInterface $mail,
        ResellerRepositoryInterface $resellerRepository,
        ResellerInterfaceFactory $resellerFactory,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context, $contactsConfig);
        $this->context = $context;
        $this->mail = $mail;
        $this->resellerRepository = $resellerRepository;
        $this->resellerFactory = $resellerFactory;
        $this->collectionFactory = $collectionFactory;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }

        try {
            $this->saveData($this->validatedParams());
            $this->messageManager->addSuccessMessage(
                __('Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.')
            );
            $this->dataPersistor->clear('cadastro_reseller');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('cadastro_reseller', $this->getRequest()->getParams());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            $this->dataPersistor->set('cadastro_reseller', $this->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('Cadastro/reseller');
    }


    /**
     * @param array $post Post data to email for new reseller
     * @return void
     */
    private function saveData($post)
    {
        $reseller = $this->resellerFactory->create();
        $reseller->setName($post['name']);
        $reseller->setCPF($post['cpf']);
        $reseller->setEmail($post['email']);
        $reseller->setPhone($post['phone']);
        $reseller->setCity($post['city']);
        $reseller->setProducts($post['products']);
        $reseller->setObs($post['comment']);
        $this->resellerRepository->save($reseller);
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function validatedParams()
    {
        $request = $this->getRequest();

        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }

        if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }
        return $request->getParams();
    }
}
