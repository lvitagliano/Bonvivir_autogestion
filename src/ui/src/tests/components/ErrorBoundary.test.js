import React from 'react';
import { render } from 'react-testing-library';

import { BaseComponent } from '../setup';
import ErrorBoundary from '../../components/ErrorBoundary';

test('render', () => {
  const { container } = render(
    <BaseComponent>
      <ErrorBoundary>
        <p />
      </ErrorBoundary>
    </BaseComponent>
  );

  expect(container).toMatchSnapshot();
});
