<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contatos Controller
 *
 * @property \App\Model\Table\ContatosTable $Contatos
 *
 * @method \App\Model\Entity\Contato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContatosController extends AppController
{

    public function isAuthorized($user){
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'view', 'index', 'edit', 'delete', 'logout'])) {
            return true;
        }
        return false;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $contatos = $this->paginate($this->Contatos);

        $this->set(compact('contatos'));
    }

    /**
     * View method
     *
     * @param string|null $id Contato id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contato = $this->Contatos->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('contato', $contato);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idCliente)
    {
        $contato = $this->Contatos->newEntity();
        if ($this->request->is('post')) {
            $contato = $this->Contatos->patchEntity($contato, $this->request->getData());
            if ($this->Contatos->save($contato)) {
                $this->Flash->success(__('Contato adicionado!'));
            } else{
                $this->Flash->error('Houve um erro ao cadastrar o contato! Tente novamente, ou então anote o horário e avise a Bruno.');
            }
            return $this->redirect(['controller' => 'clientes', 'action' => 'view', $contato->cliente_id]);
        }
        $contato->cliente_id = $idCliente;
        $this->set(compact('contato'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contato = $this->Contatos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contato = $this->Contatos->patchEntity($contato, $this->request->getData());
            if ($this->Contatos->save($contato)) {
                $this->Flash->success(__('The contato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contato could not be saved. Please, try again.'));
        }
        $clientes = $this->Contatos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('contato', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contato = $this->Contatos->get($id);
        if ($this->Contatos->delete($contato)) {
            $this->Flash->success(__('The contato has been deleted.'));
        } else {
            $this->Flash->error(__('The contato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
