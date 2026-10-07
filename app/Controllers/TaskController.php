<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function newTask()
    {
        return view('task_form', [
            'task' => [
                'title' => '',
                'status' => 'pending',
                'task_date' => '',
            ],
        ]);
    }

    public function create()
    {
        if (
            !$this->validate([
                'title' => 'required|max_length[150]',
                'task_date' => 'required|valid_date[Y-m-d]',
            ])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => trim((string) $this->request->getPost('title')),
            'status' => 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created.');
    }
    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || (int) $task['is_archived'] === 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('task_form', ['task' => $task]);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || (int) $task['is_archived'] === 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        if (
            !$this->validate([
                'title' => 'required|max_length[150]',
                'task_date' => 'required|valid_date[Y-m-d]',
                'status' => 'required|in_list[pending,completed]',
            ])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated.');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || (int) $task['is_archived'] === 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived.');
    }
}