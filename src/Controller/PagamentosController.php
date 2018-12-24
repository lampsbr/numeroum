<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
/**
 * Pagamentos Controller
 *
 * @property \App\Model\Table\PagamentosTable $Pagamentos
 *
 * @method \App\Model\Entity\Pagamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagamentosController extends AppController
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
        $pagamentos = $this->paginate($this->Pagamentos);

        $this->set(compact('pagamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagamento = $this->Pagamentos->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('pagamento', $pagamento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idCliente)
    {
        $pagamento = $this->Pagamentos->newEntity();
        if ($this->request->is('post')) {
            $cli = $this->Pagamentos->Clientes->get($this->request->getData()['cliente_id']);
            $pagamento = $this->Pagamentos->newEntity($this->request->getData(), ['associated' => ['Clientes']]);
            $pagamento->cliente->saldo_devedor -= $pagamento->valor;
            $dados['cliente'] = ['id' =>$dados['cliente_id'], 'saldo_devedor' => ($cli->saldo_devedor - $dados['valor'])];
            Log::write('error', $dados);
            $pagamento = $this->Pagamentos->patchEntity($pagamento, $dados);
            $pagamento->cliente
            Log::write('error', $pagamento);
            if ($this->Pagamentos->save($pagamento)) {
                $this->Flash->success('Pagamento cadastrado!');
            } else{
                $this->Flash->error('Houve um erro ao cadastrar o pagamento! Tente novamente, ou então anote o horário e avise a Bruno.');
            }
            return $this->redirect(['controller' => 'clientes', 'action' => 'view', $pagamento->cliente_id]);
        }
        $pagamento->cliente_id = $idCliente;
        $this->set(compact('pagamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagamento = $this->Pagamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagamento = $this->Pagamentos->patchEntity($pagamento, $this->request->getData());
            if ($this->Pagamentos->save($pagamento)) {
                $this->Flash->success(__('The pagamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagamento could not be saved. Please, try again.'));
        }
        $clientes = $this->Pagamentos->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('pagamento', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagamento = $this->Pagamentos->get($id);
        if ($this->Pagamentos->delete($pagamento)) {
            $this->Flash->success(__('The pagamento has been deleted.'));
        } else {
            $this->Flash->error(__('The pagamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
