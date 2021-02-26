import React from 'react';
import PropTypes from 'prop-types';
import Typography from '@material-ui/core/Typography';
import Skeleton from '@material-ui/lab/Skeleton';
import Grid from '@material-ui/core/Grid';

const variants = ['h2'];

function TypographyDemo(props) {
  const { loading = false } = props;

  return (
    <div>
      {variants.map((variant) => (
        <Typography component="div" key={variant} variant={variant}>
         <Skeleton />
        </Typography>
      ))}
    </div>
  );
}

TypographyDemo.propTypes = {
  loading: PropTypes.bool,
};

export default function SkeletonTypography() {
  return (
    <Grid container spacing={1}>
      <Grid item xs>
        <TypographyDemo />
      </Grid>
    </Grid>
  );
}