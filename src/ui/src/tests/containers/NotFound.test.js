import React from 'react';
import { render } from 'react-testing-library';

import { BaseContainer } from '../setup';
import { NotFound } from '../../containers';

test('render', () => {
  const { container } = render(
    <BaseContainer>
      <NotFound />
    </BaseContainer>
  );

  expect(container).toMatchSnapshot();
});
