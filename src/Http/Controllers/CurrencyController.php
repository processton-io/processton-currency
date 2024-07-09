<?php

namespace Processton\ProcesstonCurrency\Http\Controllers;

use App\Http\Controllers\Controller;
use Processton\ProcesstonCurrency\Models\Currency;
use Processton\ProcesstonDataTable\ProcesstonDataTable;
use Processton\ProcesstonForm\ProcesstonForm;
use Processton\ProcesstonInteraction\ProcesstonInteraction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller {

    public function index() {

        $data = Currency::paginate();

        return response()->json([
            'data' => ProcesstonDataTable::generateDataTableData([
                [
                    'value' => 'name',
                    'label' => 'Name'
                ],
                [
                    'value' => 'code',
                    'label' => 'Code'
                ],
                [
                    'value' => 'symbol',
                    'label' => 'Symbol'
                ],
                [
                    'value' => 'is_active',
                    'label' => 'Status',
                    'type' => 'status',
                    'config' => [
                        'mapping' => [
                            
                            [
                                'value' => 0,
                                'icon' => 'user',
                                'message' => 'Inactive',
                                'color' => 'red'
                            ],
                            [
                                'value' => 1,
                                'icon' => 'user',
                                'message' => 'Active',
                                'color' => 'green'
                            ]
                        ]
                    ]
                ]
            ], $data, true, true, true, [], [], [
                [
                    'type' => 'model',
                    'label' => 'Block',
                    'action' => '/currencies/block',
                    'color' => 'dangerous',
                    'attachments' => [
                        [
                            'key' => 'id',
                            'value' => 'id'
                        ]
                    ],
                    'conditions' => [
                        [
                            'operator' => 'EQUALS',
                            'key' => 'is_active',
                            'value' => 1
                        ]
                    ]
                ],
                [
                    'type' => 'model',
                    'label' => 'Un Block',
                    'action' => '/currencies/un-block',
                    'color' => 'success',
                    'attachments' => [
                        [
                            'key' => 'id',
                            'value' => 'id'
                        ]
                    ],
                    'conditions' => [
                        [
                            'operator' => 'EQUALS',
                            'key' => 'is_active',
                            'value' => 0
                        ]
                    ]
                ]
            ])
        ]);
    }


    public function allowCurrency(Request $request): JsonResponse
    {
        $id = $request->get('id', false);

        $currency = Currency::find($id);

        if ($request->method() == 'POST') {


            $currency->__set('is_active', 1);
            $currency->__set('note', '');
            $currency->save();

            return response()->json([
                'next' => [
                    'type' => 'redirect',
                    'action' => route('processton-client.app.interaction', [
                        'app_slug' => 'setup',
                        'interaction_slug' => 'currencies'
                    ])
                ],
                'message' => 'Currency '. $currency->name.' is allowed'
            ]);
        }

        return response()->json([
            'interaction' => ProcesstonInteraction::generateInteraction(
                'Dashboard',
                'dashboard',
                'Dashboard',
                'dashboard',
                [],
                [],
                [
                    ProcesstonInteraction::generateRow(
                        [
                            ProcesstonForm::generateForm(
                                'Activate currency ' . $currency->name,
                                route('processton-app-user.un_block', [
                                    'id' => $currency->id
                                ]),
                                ProcesstonForm::generateFormSchema(
                                    'Activate currency ' . $currency->name,
                                    'Activate',
                                    ProcesstonForm::generateFormRows(
                                        ProcesstonForm::generateFormRow([
                                            ProcesstonForm::generateFormRowElement('Note', 'text_area', 'note', 'Note', false)
                                        ])
                                    )
                                ),
                                [],
                                [],
                                '',
                                ProcesstonInteraction::width(12, 12, 12)
                            )
                        ],
                        ProcesstonInteraction::width(12, 12, 12)
                    )
                ]
            )
        ]);
    }

    public function blockCurrency(Request $request): JsonResponse
    {
        $id = $request->get('id', false);

        $currency = Currency::find($id);

        if ($request->method() == 'POST') {

            $requestData = $request->validate([
                'note' => 'required|string|max:255'
            ]);

            $currency->__set('is_active', 0);
            $currency->__set('note', $requestData['note'] ?? '');
            $currency->save();


            return response()->json([
                'next' => [
                    'type' => 'redirect',
                    'action' => route('processton-client.app.interaction', [
                        'app_slug' => 'setup',
                        'interaction_slug' => 'currencies'
                    ])
                ],
                'message' => 'Currency ' . $currency->name . ' is blocked'
            ]);
        }

        return response()->json([
            'interaction' => ProcesstonInteraction::generateInteraction(
                'Dashboard',
                'dashboard',
                'Dashboard',
                'dashboard',
                [],
                [],
                [
                    ProcesstonInteraction::generateRow(
                        [
                            ProcesstonForm::generateForm(
                                'Block currency ' . $currency->name,
                                route('processton-app-user.block', [
                                    'id' => $currency->id
                                ]),
                                ProcesstonForm::generateFormSchema(
                                    'Block currency ' . $currency->name,
                                    'Block',
                                    ProcesstonForm::generateFormRows(
                                        ProcesstonForm::generateFormRow([
                                            ProcesstonForm::generateFormRowElement('Note', 'text_area', 'note', 'Note', true)
                                        ])
                                    )
                                ),
                                [],
                                [],
                                '',
                                ProcesstonInteraction::width(12, 12, 12)
                            )
                        ],
                        ProcesstonInteraction::width(12, 12, 12)
                    ),
                ]
            )
        ]);
    }
}