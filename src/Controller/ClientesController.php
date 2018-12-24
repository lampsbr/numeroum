<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
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
            'contain' => ['Users']
        ];
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Users', 'Contatos', 'Pagamentos', 'Vendas']
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            $cliente->user_id = $this->Auth->user('id');
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('A cliente foi cadastrada!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Houve um erro ao cadastrar a cliente! Tente novamente, ou então anote o horário e avise a Bruno.'));
        }
        $users = $this->Clientes->Users->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            $cliente->user_id = $this->Auth->user('id');
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('A cliente foi salva!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Houve um erro ao alterar a cliente! Tente novamente, ou então anote o horário e avise a Bruno.'));
        }
        $users = $this->Clientes->Users->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('A cliente foi apagada.'));
        } else {
            $this->Flash->error(__('Houve um erro ao apagar a cliente! Tente novamente, ou então anote o horário e avise a Bruno.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
