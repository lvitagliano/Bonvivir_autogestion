import React from 'react';
import { render } from 'react-testing-library';

import { BaseContainer } from '../setup';
import { Routes } from '../../containers';

test('render', () => {
  const { container } = render(
    <BaseContainer>
      <Routes />
    </BaseContainer>
  );

  expect(container).toMatchSnapshot();
});
